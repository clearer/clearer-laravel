<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{ mix(Spark::usesRightToLeftTheme() ? 'css/app-rtl.css' : 'css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>

    <div id="spark-app">

    <header class="app-header">
        <p class="app-header__logo">Clearer</p>

        <div class="app-header__menus">

            @if (Auth::check())

                @component('components.dropdown')

                    @slot('label')
                        <img class="avatar--sm" src="{{ Auth::user()->currentTeam->photo_url }}" />
                        {{ Auth::user()->currentTeam->name }}
                    @endslot

                    @slot('menu')

                        @foreach(Auth::user()->teams as $team)
                            <a href="/{{ $team->slug }}/projects" class="dropdown__menu-item">
                                <img class="avatar--sm" src="{{ $team->photo_url }}" />
                                {{ $team->name }}
                            </a>
                        @endforeach
                        <a href="/settings/teams" class="dropdown__menu-item">
                            <i class="material-icons">people</i>
                            Create Team
                        </a>
                    @endslot

                @endcomponent
                
                @component('components.dropdown')

                    @slot('label')
                        <img class="avatar--sm" src="{{ Auth::user()->photo_url }}" />
                        {{ Auth::user()->name }}
                    @endslot

                    @slot('menu')
                        <a href="/settings" class="dropdown__menu-item">
                            <i class="material-icons">settings</i>
                            Settings
                        </a>
                        <a href="/logout" class="dropdown__menu-item">
                            <i class="material-icons">lock</i>
                            Logout
                        </a>
                    @endslot

                @endcomponent

            @endif

        </div>
            
    </header>



    <div v-cloak>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif
    </div>

    </div>

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>
</body>
</html>
