
<form role="form">

    @if (Spark::usesTeams() && Spark::onlyTeamPlans())

        <div class="form__group">
            <!-- Team Name -->
            <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_name') }}</label>
            <input type="text" class="form-control" name="team" v-model="registerForm.team" :class="{'is-invalid': registerForm.errors.has('team')}" autofocus>
            
            <span class="alert alert--warning" v-show="registerForm.errors.has('team')">
                @{{ registerForm.errors.get('team') }}
            </span>
        </div>
    
        @if (Spark::teamsIdentifiedByPath())
            <div class="form__group">
                <!-- Team Slug (Only Shown When Using Paths For Teams) -->
                <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_slug') }}</label>
                <input type="text" class="form-control" name="team_slug" v-model="registerForm.team_slug" :class="{'is-invalid': registerForm.errors.has('team_slug')}" autofocus>
                <small class="form-text text-muted" v-show="! registerForm.errors.has('team_slug')">
                    {{__('teams.slug_input_explanation')}}
                </small>
                <span class="alert alert--warning" v-show="registerForm.errors.has('team_slug')">
                    @{{ registerForm.errors.get('team_slug') }}
                </span>
            </div>
        @endif

    @endif
    
    <div class="form__group">
        <!-- Name -->
        <label class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>      
        <input type="text" class="form-control" name="name" v-model="registerForm.name" :class="{'is-invalid': registerForm.errors.has('name')}" autofocus>
        
        <span class="alert alert--warning" v-show="registerForm.errors.has('name')">
            @{{ registerForm.errors.get('name') }}
        </span>
    </div>

    <div class="form__group">
        <!-- E-Mail Address -->
        <label class="col-md-4 col-form-label text-md-right">{{__('E-Mail Address')}}</label>
        <input type="email" class="form-control" name="email" v-model="registerForm.email" :class="{'is-invalid': registerForm.errors.has('email')}">
        
        <span class="alert alert--warning" v-show="registerForm.errors.has('email')">
            @{{ registerForm.errors.get('email') }}
        </span>
    </div>

    <div class="form__group">
        <!-- Password -->
        <label class="col-md-4 col-form-label text-md-right">{{__('Password')}}</label>
        <input type="password" class="form-control" name="password" v-model="registerForm.password" :class="{'is-invalid': registerForm.errors.has('password')}">
        
        <span class="alert alert--warning" v-show="registerForm.errors.has('password')">
            @{{ registerForm.errors.get('password') }}
        </span>
    </div>

    <div class="form__group">
        <!-- Password Confirmation -->
        <label class="col-md-4 col-form-label text-md-right">{{__('Confirm Password')}}</label>
        <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation" :class="{'is-invalid': registerForm.errors.has('password_confirmation')}">
        
        <span class="alert alert--warning" v-show="registerForm.errors.has('password_confirmation')">
            @{{ registerForm.errors.get('password_confirmation') }}
        </span>
    </div>

    <div class="form__group">
        <!-- Terms And Conditions -->
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" v-model="registerForm.terms">
            {!! __('I Accept :linkOpen The Terms Of Service :linkClose', ['linkOpen' => '<a href="/terms" target="_blank">', 'linkClose' => '</a>']) !!}
        </label>
        <span class="alert alert--warning" v-show="registerForm.errors.has('terms')">
            <strong>@{{ registerForm.errors.get('terms') }}</strong>
        </span>
    </div>
    
    <button class="button" @click.prevent="register" :disabled="registerForm.busy">
        <span v-if="registerForm.busy" class="flex-align">
            <i class="material-icons">assignment_late</i> {{__('Registering')}}
        </span>
    
        <span v-else class="flex-align">
            <i class="material-icons">assignment_turned_in</i> {{__('Register')}}
        </span>
    </button>
</form>