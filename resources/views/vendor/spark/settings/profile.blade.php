<spark-profile :user="user" inline-template>
    <div class="container">
        <h2 class="mb-8">My Profile</h2>
        <!-- Update Profile Photo -->
        @include('spark::settings.profile.update-profile-photo')

        <!-- Update Contact Information -->
        @include('spark::settings.profile.update-contact-information')
    </div>
</spark-profile>
