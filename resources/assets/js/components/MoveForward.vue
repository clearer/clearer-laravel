<template>
    <a class="d-flex" href="javascript:void(0);">
        <i v-on:click="toggleIdea()" v-if="!pending && !ideaStatus" class="material-icons" style="color: gray; font-size: 1.25rem;">arrow_forward</i>
        <i v-on:click="toggleIdea()" v-if="!pending && ideaStatus" class="material-icons" style="color: green; font-size: 1.25rem;">arrow_forward</i>
        
        <svg xmlns="http://www.w3.org/2000/svg" v-if="pending" class="mr-2 a-spin icon" width="8" height="8" viewBox="0 0 8 8">
            <path d="M4 0c-2.2 0-4 1.8-4 4s1.8 4 4 4c1.1 0 2.12-.43 2.84-1.16l-.72-.72c-.54.54-1.29.88-2.13.88-1.66 0-3-1.34-3-3s1.34-3 3-3c.83 0 1.55.36 2.09.91l-1.09 1.09h3v-3l-1.19 1.19c-.72-.72-1.71-1.19-2.81-1.19z" />
        </svg>
    </a>
</template>

<script>
import axios from 'axios';

export default {
    props: [
        'ideaId',
        'hasBeenActedOn'
    ],
    data() {
        return {
            pending: false,
            ideaStatus: this.hasBeenActedOn ? true : false
        }
    },
    methods: {
        toggleIdea: function() {
            this.pending = true;

            if(this.ideaStatus) {
                console.log('move forward');
                console.log(this.ideaId);
                this.moveBackward();
            } else {
                console.log('move back');
                this.moveForward();
            }
        },
        moveForward: function() {
            console.log('forward');
            axios
                .put('/ideas/' + this.ideaId, {
                    acted_on: true
                })
                .then( res => {
                    location.reload();

                })
                .catch( err => {
                    console.log(err);
                });
        },
        moveBackward: function() {

            console.log('back');

            axios
                .put('/ideas/' + this.ideaId, {
                    acted_on: false
                })
                .then( res => {  
                    location.reload();
                })
                .catch( err => {
                    console.log(err);
                });
        }
    }
}
</script>