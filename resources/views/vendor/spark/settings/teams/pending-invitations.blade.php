<spark-pending-invitations inline-template>
    <div v-if="invitations.length > 0">
            <h5 class="mb-2 mt-8">{{__('Pending Invitations')}}</h5>

            <div class="table-responsive" >
                <table class="table table-valign-middle mb-0">
                    <thead>
                        <th>{{ __('teams.team') }}</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        <tr v-for="invitation in invitations">
                            <!-- Team Name -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ invitation.team.name }}
                                </div>
                            </td>

                            <!-- Accept Button -->
                            <td class="align--right">
                                <button class="button button--inline button--inverse" @click="accept(invitation)">
                                    <i class="fa fa-check"></i>
                                </button>

                                <button class="button button--inline button--inverse-error" @click="reject(invitation)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</spark-pending-invitations>
