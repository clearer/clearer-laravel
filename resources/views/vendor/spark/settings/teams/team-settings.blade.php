@extends('layouts.app')

@section('scripts')
    @if (Spark::billsUsingStripe())
        <script src="https://js.stripe.com/v3/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
<spark-team-settings :user="user" :team-id="{{ $team->id }}" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <!-- Tabs -->
            <div class="col-md-3 spark-settings-tabs">
                <aside>
                    <h3 class="nav-heading ">
                        {{__('teams.team_settings')}}
                    </h3>
                    <ul class="nav flex-column mb-4 ">
                        @if (Auth::user()->ownsTeam($team))
                            <li class="nav-item ">
                                <a class="nav-link" href="#owner" aria-controls="owner" role="tab" data-toggle="tab">
                                    
                                    {{__('teams.team_profile')}}
                                </a>
                            </li>
                        @endif

                        <li class="nav-item ">
                            <a class="nav-link" href="#membership" aria-controls="membership" role="tab" data-toggle="tab">
                                
                                {{__('Membership')}}
                            </a>
                        </li>

                            @if (Spark::createsAdditionalTeams())
                                <li class="nav-item ">
                                    <a class="nav-link" href="/settings#/{{str_plural(Spark::teamsPrefix())}}">
                                        
                                        {{__('teams.view_all_teams')}}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item ">
                                    <a class="nav-link" href="/settings">
                                        
                                        {{__('Your Settings')}}
                                    </a>
                                </li>
                            @endif
                    </ul>
                </aside>

                @if (Spark::canBillTeams() && Auth::user()->ownsTeam($team))
                    <aside>
                        <h3 class="nav-heading ">
                            {{__('teams.team_billing')}}
                        </h3>
                        <ul class="nav flex-column mb-4 ">
                            @if (Spark::hasPaidTeamPlans())
                                <li class="nav-item ">
                                    <a class="nav-link" href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                        
                                        {{__('Subscription')}}
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="#payment-method" aria-controls="payment-method" role="tab" data-toggle="tab">
                                        
                                        {{__('Payment Method')}}
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">
                                        
                                        {{__('Invoices')}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </aside>
                @endif
            </div>

            <!-- Tab cards -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Owner Information -->
                    @if (Auth::user()->ownsTeam($team))
                        <div role="tabcard" class="tab-pane active" id="owner">
                            @include('spark::settings.teams.team-profile')
                        </div>
                    @endif

                    <!-- Membership -->
                    @if (Auth::user()->ownsTeam($team))
                    <div role="tabcard" class="tab-pane" id="membership">
                    @else
                    <div role="tabcard" class="tab-pane active" id="membership">
                    @endif
                        <div v-if="team">
                            @include('spark::settings.teams.team-membership')
                        </div>
                    </div>

                    <!-- Billing Tab Panes -->
                    @if (Spark::canBillTeams() && Auth::user()->ownsTeam($team))
                        @if (Spark::hasPaidTeamPlans())
                            <!-- Subscription -->
                            <div role="tabcard" class="tab-pane" id="subscription">
                                <div v-if="user && team">
                                    @include('spark::settings.subscription')
                                </div>
                            </div>
                        @endif

                        <!-- Payment Method -->
                        <div role="tabcard" class="tab-pane" id="payment-method">
                            <div v-if="user && team">
                                @include('spark::settings.payment-method')
                            </div>
                        </div>

                        <!-- Invoices -->
                        <div role="tabcard" class="tab-pane" id="invoices">
                            <div v-if="user && team">
                                @include('spark::settings.invoices')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</spark-team-settings>
@endsection
