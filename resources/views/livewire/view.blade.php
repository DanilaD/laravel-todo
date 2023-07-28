<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title text-capitalize text-center">Task Management</h3>
        <div class="panel-actions">
            <button type="button" class="btn btn-outline-primary btn-sm mb-2" wire:click="add()">Create Task</button>
        </div>
    </div>
    <div class="panel-body">
        <hr/>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Search by Name</label>
                    <input class="form-control" wire:model="search.name" />
                </div>
                <div class="col-md-6">
                    <label>Search by Project</label>
                    <select class="form-control" wire:model="search.project_id">
                        <option></option>
                        @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr/>
        <div>
            <ul wire:sortable="updateTaskOrder">
                @foreach ($data as $v)
                    <div wire:sortable.item="{{ $v->id }}" wire:key="task-{{ $v->id }}" draggable="true" >
                        <div class="row">
                            <div class="col-md-6">
                                {{$v->name}}
                            </div>
                            <div class="col-md-2">
                                {{$v->Project->name}}
                            </div>
                            <div class="col-md-2">
                                {{\Carbon\Carbon::parse($v->created_at)->format('m/d/Y h:i A')}}
                            </div>
                            <div class="col-md-2">
                                <div x-data="{ open: false }">
                                    <button class="btn btn-outline-success btn-sm" wire:click="edit({{$v->id}})">edit</button>
                                    <button @click="open = true" x-show="!open" class="btn btn-outline-danger btn-sm">delete</button>
                                    <button x-show="open" @click.away="open=false" x-cloak type="button" class="btn btn-danger btn-sm" wire:click="delete('{{ $v->id }}')">confirm</button>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    </div>
                @endforeach
            </ul>
            {{ $data->links() }}
        </div>
    </div>
</div>
