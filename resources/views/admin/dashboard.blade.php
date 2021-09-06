@extends('layouts.app')
@section('title', 'dashboard')
@section('content')
<div style="display: flex; height: 100vh; justify-content: center">
    <div class="container is-max-widescreen" style="
            margin-top: 75px;
            border: 2.7px solid white;
            border-radius: 5px;
            background-color: white;
        ">
        <section class="hero is-primary">
            <div class="hero-body">
                <p class="title">
                    {{auth()->user()->name}}
                </p>
                <p class="subtitle">Role: {{auth()->user()->role}}</p>
            </div>
        </section>

        <div style="margin: 25px">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification is-primary">
                                <p class="title">Kullanıcı İşlemleri</p>
                                <p class="subtitle">
                                    <form action="{{route('admin.users')}}">
                                        <button type="submit" class="button is-info">Git</button>
                                    </form>
                                </p>
                            </article>
                            <article class="tile is-child notification is-primary">
                                <p class="title">Todo List İşlemleri</p>
                                <p class="subtitle">
                                    <button class="button is-info">Git</button>
                                </p>
                            </article>
                            <article class="tile is-child notification is-warning">
                                <p class="title">Kategori İşlemleri</p>
                                <p class="subtitle">
                                    <button class="button is-info">Git</button>
                                </p>
                            </article>
                        </div>

                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info">
                                <p class="title">Ürün İşlemleri</p>
                                <p class="subtitle">
                                    <form action="{{route('admin.products')}}">
                                        <button type="submit" class="button is-primary">
                                            Git
                                        </button>
                                    </form>
                                </p>
                                <figure class="image is-4by3">
                                    <img style="border-radius: 10px; margin-top: 10px"
                                        src="https://girisimturkiye.com/wp-content/uploads/2016/12/wsi-imageoptim-urunu-piyasaya-surmek.jpg" />
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
