<spark-current-teams :user="user" :teams="teams" inline-template>
    <div class="mt-8">
            <h5>{{__('teams.current_teams')}}</h5>

            <div class="table-responsive">
                <table class="table table-valign-middle mt-2 mb-0">
                    <thead>
                        <th class="th-fit"></th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Owner')}}</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        <tr  v-for="team in teams">
                            <!-- Photo -->
                            <td class="align--center">
                                <img :src="team.photo_url" class="avatar--sm">
                            </td>

                            <!-- Team Name -->
                            <td>
                               
                                    @{{ team.name }}
                            </td>

                            <!-- Owner Name -->
                            <td>
                                    <span v-if="user.id == team.owner.id">
                                        {{__('You')}}
                                    </span>

                                    <span v-else>
                                        @{{ team.owner.name }}
                                    </span>
                            </td>

                            <!-- Edit Button -->
                            <td class="align--right">
                                <a :href="'/settings/{{Spark::teamsPrefix()}}/'+team.id" class="button--inline button--inverse">
                                    <i class="fa fa-cog"></i>
                                </a>

                                <button class="btn btn-outline-warning" @click="approveLeavingTeam(team)"
                                        data-toggle="tooltip" title="{{__('teams.leave_team')}}"
                                        v-if="user.id !== team.owner_id">
                                    <i class="fa fa-sign-out"></i>
                                </button>

                                @if (Spark::createsAdditionalTeams())
                                    <a href="javascript:void(0);" class="button--inline button--inverse button--error" @click="approveTeamDelete(team)" v-if="user.id === team.owner_id">
                                        <i class="fa fa-times"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Leave Team Modal -->
        <div class="modal" id="modal-leave-team" tabindex="-1" role="dialog" v-if="leavingTeam">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{__('teams.leave_team')}} (@{{ leavingTeam.name }})
                        </h5>
                    </div>

                    <div class="modal-body">
                        {{__('teams.are_you_sure_you_want_to_leave_team')}}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('No, Go Back')}}</button>

                        <button type="button" class="btn btn-warning" @click="leaveTeam" :disabled="leaveTeamForm.busy">
                            {{__('Yes, Leave')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Team Modal -->
        <div class="modal" id="modal-delete-team" tabindex="-1" role="dialog" v-if="deletingTeam">
            <div class="modal__content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{__('teams.delete_team')}}
                        </h5>
                    </div>

                    <div class="modal-body">
                        {{__('teams.are_you_sure_you_want_to_delete_team')}}
                        {{__('teams.if_you_delete_team_all_data_will_be_deleted')}}
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('No, Go Back')}}</button>

                        <button type="button" class="btn btn-danger" @click="deleteTeam" :disabled="deleteTeamForm.busy">
                            <span v-if="deleteTeamForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Deleting')}}
                            </span>

                            <span v-else>
                                {{__('Yes, Delete')}}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
    </div>
</spark-current-teams>
