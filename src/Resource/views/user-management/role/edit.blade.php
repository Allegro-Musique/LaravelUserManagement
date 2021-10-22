@extends('user-management.master')

@section('header')
    @parent

@endsection

@section('breadcrumb')
    @include('mekaeils-package.layouts.breadcrumb',[
        'pageTitle' => 'Create Role',
        'lists' => [
            [
                'link'  => '#',
                'name'  => 'User Management',
            ],
            [
                'link'  => 'admin.user_management.role.index',
                'name'  => 'Roles',
            ],
            [
                'link'  => '#',
                'name'  => 'Edit role' . $role->title, 
            ]
        ]
    ])
@endsection

@section('content')

    <form class="forms-sample" method="POST" action="{{ route('admin.user_management.role.update',  $role->id) }}">
        @method('PUT')
        {!! csrf_field() !!}

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="guard_name">guard name</label>
                                <select class="form-control" name="guard_name" id="guard_name">
                                    <option value="api" selected>api</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permissions</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                @forelse ($permissions as $item)                                
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permissions[]" value="{{ $item->id }}" {{ in_array($item->id,$roleHasPermissions) ? 'checked' : '' }} class="form-check-input">
                                            {{ $item->name}}
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                @empty
                                    ----
                                @endforelse                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
            <a href="{{ route('admin.user_management.role.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>

@endsection


@section('footer')
    @parent
    
@endsection