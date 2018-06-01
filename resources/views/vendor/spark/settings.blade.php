@extends('layouts.app')

@section('scripts')
    @if (Spark::billsUsingStripe())
        <script src="https://js.stripe.com/v3/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
<div class="content cards flex-center">
    <div class="card card--large">
        <h2 class="mb-8">Settings</h2>

            @include('spark::settings.profile')

            @include('spark::settings.teams')

            @if (Spark::canBillCustomers())
                            @if (Spark::hasPaidPlans())
                            <!-- Subscription -->
                                <div role="tabcard" class="tab-pane" id="subscription">
                                    <div v-if="user">
                                        @include('spark::settings.subscription')
                                    </div>
                                </div>
                            @endif

                        <!-- Payment Method -->
                            <div role="tabcard" class="tab-pane" id="payment-method">
                                <div v-if="user">
                                    @include('spark::settings.payment-method')
                                </div>
                            </div>

                            <!-- Invoices -->
                            <div role="tabcard" class="tab-pane" id="invoices">
                                @include('spark::settings.invoices')
                            </div>
                        @endif


        {{--
    <spark-settings :user="user" :teams="teams" inline-template>
        <div class="spark-screen container">
            <div class="row">
                <!-- Tabs -->
                <div class="col-md-3 spark-settings-tabs">
                    <aside>
                        <h3 class="nav-heading ">
                            {{__('Settings')}}
                        </h3>
                        <ul class="nav flex-column mb-4 ">
                            <li class="nav-item ">
                                <a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                    
                                    {{__('Profile')}}
                                </a>
                            </li>

                            @if (Spark::usesTeams())
                                <li class="nav-item ">
                                    <a class="nav-link" href="#{{Spark::teamsPrefix()}}" aria-controls="teams" role="tab" data-toggle="tab">
                                        
                                        {{__('teams.teams')}}
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item ">
                                <a class="nav-link" href="#security" aria-controls="security" role="tab" data-toggle="tab">
                                    
                                    {{__('Security')}}
                                </a>
                            </li>

                            @if (Spark::usesApi())
                                <li class="nav-item ">
                                    <a class="nav-link" href="#api" aria-controls="api" role="tab" data-toggle="tab">
                                        
                                        {{__('API')}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </aside>

                    <!-- Billing Tabs -->
                    @if (Spark::canBillCustomers())
                        <aside>
                            <h3 class="nav-heading ">
                                {{__('Billing')}}
                            </h3>
                            <ul class="nav flex-column mb-4 ">
                                @if (Spark::hasPaidPlans())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                            
                                            {{__('Subscription')}}
                                        </a>
                                    </li>
                                @endif

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
                            </ul>
                        </aside>
                    @endif
                </div>

                <!-- Tab cards -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Profile -->
                        <div role="tabcard" class="tab-pane active" id="profile">
                            @include('spark::settings.profile')
                        </div>

                        <!-- Teams -->
                        @if (Spark::usesTeams())
                            <div role="tabcard" class="tab-pane" id="{{Spark::teamsPrefix()}}">
                                @include('spark::settings.teams')
                            </div>
                        @endif

                    <!-- Security -->
                        <div role="tabcard" class="tab-pane" id="security">
                            @include('spark::settings.security')
                        </div>

                        <!-- API -->
                        @if (Spark::usesApi())
                            <div role="tabcard" class="tab-pane" id="api">
                                @include('spark::settings.api')
                            </div>
                        @endif

                    <!-- Billing Tab Panes -->
                        @if (Spark::canBillCustomers())
                            @if (Spark::hasPaidPlans())
                            <!-- Subscription -->
                                <div role="tabcard" class="tab-pane" id="subscription">
                                    <div v-if="user">
                                        @include('spark::settings.subscription')
                                    </div>
                                </div>
                            @endif

                        <!-- Payment Method -->
                            <div role="tabcard" class="tab-pane" id="payment-method">
                                <div v-if="user">
                                    @include('spark::settings.payment-method')
                                </div>
                            </div>

                            <!-- Invoices -->
                            <div role="tabcard" class="tab-pane" id="invoices">
                                @include('spark::settings.invoices')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </spark-settings>
    --}}
</div>
</div>
@endsection
