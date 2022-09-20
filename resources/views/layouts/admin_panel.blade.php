
 <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
 <script src="{{ asset('js/app.js') }}"></script>
<div class="container index">
   
    @role( 'admin')
    <div class="admin-route">
        <div class="admin-left">
            <a class="navbar-brand " href="{{ url('/users') }}">
                Добавить роль 
            </a>
            <a class="navbar-brand" href="{{ route('users.index') }}">
                Управление Пользывателями
            </a>
        </div>
        <div class="admin-rigth">
            <a class="navbar-brand" href="{{ route('roles.index') }}">
                Управление Ролями
            </a>
            <a class="navbar-brand" href="{{ route('products.index') }}">
                Управление Продуктом
            </a>
        </div>
    </div>
    @endrole

</div>
