@extends('layouts.app')

@section('title', 'admin-user-transactions')
@section('content')

<div style="height: 100vh">
    <table class="uk-table uk-table-hover uk-table-divider" style="color: white">
        <thead>
            <tr>
                <th>Ad ve Soyad</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role ? $user->role : 'kullanıcı'}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="display: flex; justify-content: center;">
        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <div class="columns">

                <div class="column">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input class="input" name="name" style="width: 350px" type="text"
                                placeholder="e.g Alex Smith">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" name="password" type="password" placeholder="e.g. alexsmith@gmail.com">
                        </div>
                    </div>
                </div>

                <div class="column">


                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" style="width: 350px" name="email" type="email"
                                placeholder="e.g. alexsmith@gmail.com">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password Confirm</label>
                        <div class="control">
                            <input class="input" name="password_confirmation" type="password"
                                placeholder="e.g. alexsmith@gmail.com">
                        </div>
                    </div>

                </div>

            </div>
            <button class="button is-info">Create</button>
        </form>
    </div>
</div>

