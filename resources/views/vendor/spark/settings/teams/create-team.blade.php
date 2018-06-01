<spark-create-team inline-template>
    <div>
        <h3 class="mb-4">{{__('teams.create_team')}}</h3>

        <div class="card-body">
            <form role="form" v-if="canCreateMoreTeams">
                <!-- Name -->
                <div class="form__group">
                    <label>{{__('teams.team_name')}}</label>
                    <input type="text" id="create-team-name" name="name" v-model="form.name" :class="{'is-invalid': form.errors.has('name')}">

                    <span class="alert alert--warning" v-if="hasTeamLimit">
                        <?php echo __('teams.you_have_x_teams_remaining', ['teamCount' => '{{ remainingTeams }}']); ?>
                    </span>

                    <span class="alert alert--warning" v-show="form.errors.has('name')">
                        @{{ form.errors.get('name') }}
                    </span>
                </div>

                @if (Spark::teamsIdentifiedByPath())
                    <!-- Slug (Only Shown When Using Paths For Teams) -->
                    <div class="form-group">
                        <label>{{__('teams.team_slug')}}</label>
                    
                        <input type="text" id="create-team-slug" name="slug" v-model="form.slug" :class="{'is-invalid': form.errors.has('slug')}">
                    
                        <small class="form-text text-muted" v-show=" ! form.errors.has('slug')">
                            {{__('teams.slug_input_explanation')}}
                        </small>
                    
                        <span class="alert alert--warning" v-show="form.errors.has('slug')">
                            @{{ form.errors.get('slug') }}
                        </span>
                    </div>
                @endif

                <!-- Create Button -->
                <div class="form-group">
                    <button type="submit" class="button"
                        @click.prevent="create"
                        :disabled="form.busy">

                        {{__('Create')}}
                    </button>
                </div>
            </form>

            <div v-else>
                <span class="alert alert--danger">
                    {{__('teams.plan_allows_no_more_teams')}},
                    <a href="{{ url('/settings#/subscription') }}">{{__('please upgrade your subscription')}}</a>.
                </span>
            </div>
        </div>
    </div>
</spark-create-team>
