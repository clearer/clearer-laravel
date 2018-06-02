<spark-update-contact-information :user="user" inline-template>
    <div>
        <h5 class="mt-8 mb-4">{{__('Contact Information')}}</h5>

        <div class="card-body">
            <!-- Success Message -->
            <div class="alert alert--success" v-if="form.successful">
                {{__('Your contact information has been updated!')}}
            </div>

            <form role="form">
                <!-- Name -->
                <div class="form__group">
                    <label>{{__('Name')}}</label>
                    <input type="text" name="name" v-model="form.name" :class="{'is-invalid': form.errors.has('name')}">
                                    
                    <span class="alert alert--warning" v-show="form.errors.has('name')">
                        @{{ form.errors.get('name') }}
                    </span>
                </div>

                <!-- E-Mail Address -->
                <div class="form__group">
                    <label>{{__('E-Mail Address')}}</label>
                    <input type="email" name="email" v-model="form.email" :class="{'is-invalid': form.errors.has('email')}">

                    <span class="alert alert--warning" v-show="form.errors.has('email')">
                        @{{ form.errors.get('email') }}
                    </span>
                </div>

                <!-- Update Button -->
                <button type="submit" class="button"
                    @click.prevent="update"
                    :disabled="form.busy">

                    {{__('Update')}}
                </button>
            </form>
        </div>
    </div>
</spark-update-contact-information>
