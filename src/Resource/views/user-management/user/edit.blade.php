@extends('user-management.master')

@section('header')
    @parent

@endsection

@section('breadcrumb')
    @include('mekaeils-package.layouts.breadcrumb',[
        'pageTitle' => 'Edit User ' . $user->first_name . " " . $user->last_name,
        'lists' => [
            [
                'link'  => '#',
                'name'  => 'User Management',
            ],
            [
                'link'  => 'admin.user_management.user.index',
                'name'  => 'Users',
            ],
            [
                'link'  => '#',
                'name'  => 'Edit user', 
            ]
        ]
    ])
@endsection

@section('content')


<form class="forms-sample" method="POST" action="{{ route('admin.user_management.user.update', $user->id) }}">
    @method('PUT')
    {!! csrf_field() !!}

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="first_name" placeholder="First Name like: Mekaeil">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" value="{{ $user->last_name  }}" class="form-control" id="last_name" placeholder="Last Name like: Andisheh">
                        </div>
                    </div>
{{--                    <div class="col-4">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="guard_name">Departments</label>--}}
{{--                            <select multiple class="form-control" name="departments[]" id="guard_name">--}}
{{--                                <option></option>--}}
{{--                                @forelse ($departments as $item)--}}
{{--                                    <option value="{{ $item->id }}" {{ in_array($item->id, $userHasDepartments) ? 'selected' : '' }}>{{ $item->title }}</option>--}}
{{--                                @empty--}}
{{--                                    --}}
{{--                                @endforelse--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="example@mekaeil.me">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="mobile">Téléphone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="phone" placeholder="Mobile number like: 091xxxxxxxx">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Roles</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            @forelse ($roles as $item)                                
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" {{ in_array($item->id, $userHasRoles) ? 'checked' : ''  }} name="roles[]" value="{{ $item->name }}" class="form-check-input">
                                        {{ $item->title . ($item->description ? "  [ " . $item->description . " ]" : "")}}
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
        <a href="{{ route('admin.user_management.user.index') }}" class="btn btn-light">Cancel</a>
    </div>
</form>


@endsection


@section('footer')
    @parent
    
@endsection