@extends("layouts.app")


@section('title', "Admin Login")



@section('content')
<div style="display: flex;
justify-content: center;
align-items: center; height:100vh">

    <div style="display: flex; position: absolute; top:0; margin-top: 50px">
        @if(Session::has('errors'))
        <div class="notification is-danger">
            <button class="delete"></button>
            {{Session::get('errors')}}
        </div>
        @endif
    </div>

    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" name="email" id="email" placeholder="Email input" style="width: 300px"
                    value="test@example.com">
                <span class="icon is-small is-left">
                    <ion-icon name="mail" style="font-size: 23px"></ion-icon>
                </span>
                <span class="icon is-small is-right">
                    <ion-icon name="warning" style="font-size: 23px"></ion-icon>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <p class="control has-icons-left">
                <input class="input" type="password" name="password" id="password" style="width: 300px"
                    placeholder="Password">
                <span class="icon is-small is-left">
                    <ion-icon name="lock-closed" style="font-size: 23px"></ion-icon>
                </span>
            </p>
        </div>

        <div style="display:flex; justify-content: center">
            <button type="submit" class="button is-dark">Giriş</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
      const $notification = $delete.parentNode;

      $delete.addEventListener('click', () => {
        $notification.parentNode.removeChild($notification);
      });
    });
  });
</script>
@endsection

