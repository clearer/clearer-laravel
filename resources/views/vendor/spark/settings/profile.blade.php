<spark-profile :user="user" inline-template>
    <div class="container" id="profile">
        <!-- Update Profile Photo -->
        @include('spark::settings.profile.update-profile-photo')

        <!-- Update Contact Information -->
        @include('spark::settings.profile.update-contact-information')
    </div>
</spark-profile>
