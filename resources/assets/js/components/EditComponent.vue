<script>
export default {
    data: function() {
        return {
            pending: false
        }
    },
    methods: {
        togglePending: function() {
            this.pending = !this.pending;
        }
    }
}
</script>