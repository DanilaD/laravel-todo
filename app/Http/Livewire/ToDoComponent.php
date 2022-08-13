<?php

namespace App\Http\Livewire;

use App\Models\SettingsProject;
use App\Models\Tasks;
use Livewire\Component;
use Livewire\WithPagination;

class ToDoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $projects; // get for select all projects
    public $task = ['id' => null, 'name' => null, 'project_id' => null, 'priority' => 1]; // need for edit task
    public $search = ['name' => null, 'project_id' => null]; // search parameters
    public $add = false; // status for add/edit, by default false. Ca have add/edit

    public function mount()
    {
        $this->projects = SettingsProject::orderby('name', 'asc')->get();
        if($this->projects->isEmpty()) {
            $new = new SettingsProject();
            $new->fill(['name' => 'Test Project 1']);
            $new->save();
            $this->projects = SettingsProject::orderby('name', 'asc')->get();
        }
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.to-do-component', ['data' => $data]);
    }

    /**
     * Get all task and filtering
     * @return mixed
     */
    private function getData() {
        return Tasks::whereHas('Project', function ($q) {
            if($this->search['project_id']) {
                $q->where('id', $this->search['project_id']);
            }
        })->where(function ($q) {
            if($this->search['name']) {
                $q->where('name', 'like', $this->search['name'].'%');
            }
        })->orderby('priority', 'asc')->orderby('updated_at', 'desc')->get(); //paginate(15);
    }

    /**
     * Open view to add new task
     */
    public function add()
    {
        // open view
        $this->add = 'add';
    }

    /**
     * Open view to edit new task
     * @param $id
     */
    public function edit($id)
    {
        $this->task = Tasks::findOrFail($id)->toArray();
        // open view
        $this->add = 'edit';
    }

    /**
     * Store new task or store editing task
     */
    public function store()
    {
        // validate
        $this->validate([
            'task.id' => 'required_if:add,"edit"',
            'task.name' => 'required|string|max:250',
            'task.project_id' => 'required|numeric',
            'task.priority' => 'required|numeric'
        ]);

        if($this->add == 'edit') {
            // check if edit, get task from Db
            $new = Tasks::findOrFail($this->task['id']);
        } else {
            // if add new, create object
            $new = new Tasks();
        }

        // store into Db
        $new->fill([
            "name" => $this->task['name'],
            "priority" => $this->task['priority'],
            "project_id" => $this->task['project_id'],
        ]);
        $new->save();

        // reset variables and close add/edit view
        $this->cancel();
    }

    /**
     * Close the window
     */
    public function cancel()
    {
        $this->reset(['task', 'add']);
    }

    /**
     * Delete task from the Db
     * @param $id
     */
    public function delete($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
    }

    /**
     * Update priority by drag ad drop
     * @param $data
     */
    public function updateTaskOrder($data)
    {
        foreach ($data as $item) {
            Tasks::where('id', $item['value'])->update(['priority' => $item['order']]);
        }
    }

}
