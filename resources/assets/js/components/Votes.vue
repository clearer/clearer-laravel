<template>
    <div class="d-flex">
        <svg v-on:click="toggleVote()" v-if="!pending" class="icon mr-2 u-clickable" :class="{ active: voteStatus }" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8">
            <path d="M2 0c-.55 0-1.04.23-1.41.59-.36.36-.59.85-.59 1.41 0 .55.23 1.04.59 1.41l3.41 3.41 3.41-3.41c.36-.36.59-.85.59-1.41 0-.55-.23-1.04-.59-1.41-.36-.36-.85-.59-1.41-.59-.55 0-1.04.23-1.41.59-.36.36-.59.85-.59 1.41 0-.55-.23-1.04-.59-1.41-.36-.36-.85-.59-1.41-.59z"
  transform="translate(0 1)" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" v-if="pending" class="mr-2 a-spin icon" width="8" height="8" viewBox="0 0 8 8">
  <path d="M4 0c-2.2 0-4 1.8-4 4s1.8 4 4 4c1.1 0 2.12-.43 2.84-1.16l-.72-.72c-.54.54-1.29.88-2.13.88-1.66 0-3-1.34-3-3s1.34-3 3-3c.83 0 1.55.36 2.09.91l-1.09 1.09h3v-3l-1.19 1.19c-.72-.72-1.71-1.19-2.81-1.19z" />
</svg>
        {{ voteCount }}
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [
        'votes',
        'ideaId',
        'hasVoted'
    ],
    data() {
        return {
            pending: false,
            voteCount: this.votes.length,
            voteStatus: this.hasVoted ? true : false,
            voteId: this.hasVoted
        }
    },
    methods: {
        toggleVote: function() {
            this.pending = true;
            if(this.voteStatus) {
                console.log('destroy vote');
                console.log(this.voteId);
                this.destroyVote();
            } else {
                console.log('create vote');
                this.createVote();
            }
        },
        createVote: function() {
            
            axios
                .post('/vote', {
                    idea_id: this.ideaId
                })
                .then( res => {
                    console.log(res);
                    this.voteStatus = true;
                    this.voteCount++;
                    this.voteId = res.data;
                    this.pending = false;
                })
                .catch( err => {
                    console.log(err);
                });
        },
        destroyVote: function() {

            axios
                .delete('/vote/' + this.voteId, {
                    idea_id: this.ideaId
                })
                .then( res => {  
                    console.log(res);
                    this.pending = false;
                    this.voteStatus = false;
                    this.voteCount--;
                })
                .catch( err => {
                    console.log(err);
                });
        }
    }
}
</script>