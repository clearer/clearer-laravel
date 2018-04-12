<script>
export default {
    props: [
        'isOpen'
    ],
    methods: {
        toggleOpen: function() {
            this.isOpen = !this.isOpen;
        }
    }
}
</script>