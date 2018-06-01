<spark-teams :user="user" :teams="teams" inline-template>
    <div class="container">
        <h2 class="mt-2 mb-8">Team Settings</h2>
        <!-- Create Team -->
        @if (Spark::createsAdditionalTeams())
            @include('spark::settings.teams.create-team')
        @endif

        <!-- Pending Invitations -->
        @include('spark::settings.teams.pending-invitations')

        <!-- Current Teams -->
        <div v-if="user && teams.length > 0">
            @include('spark::settings.teams.current-teams')
        </div>
    </div>
</spark-teams>
