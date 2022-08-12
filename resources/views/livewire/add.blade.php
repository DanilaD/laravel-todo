<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title text-capitalize text-center">
            @if($add === 'add')
                Add New Task
            @else
                Edit Task
            @endif
        </h3>
    </div>
    <div class="panel-body">
        <hr/>
            <div class="row">
                <div class="col-md-12 mt-1">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" wire:model="task.name" />
                        @error('task.name') <span class="text-danger small">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <div class="form-group">
                        <label>Project</label>
                        <select class="form-control" wire:model="task.project_id">
                            <option></option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                        @error('task.project_id') <span class="text-danger small">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <div class="form-group">
                        <label>Priority</label>
                        <div class="form-group">
                            <input class="form-control" type="number" wire:model="task.priority"/>
                        </div>
                        @error('task.priority') <span class="text-danger small">{{$message}}</span> @enderror
                    </div>
                </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <button class="btn btn-success" wire:click="store()">Submit</button>
                    <button class="btn btn-outline-danger" wire:click="cancel()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
