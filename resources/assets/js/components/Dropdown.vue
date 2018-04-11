<script>

import { mixin as clickaway } from 'vue-clickaway';

export default {
    mixins: [ clickaway ],
    data: function () {
        return {
            isOpen: false
        }
    },
    methods: {
        toggleOpen: function () {
            this.isOpen = !this.isOpen;
        },
        close: function () {
            if( this.isOpen ) {
                this.toggleOpen();
            }
        }
    }
}
</script>