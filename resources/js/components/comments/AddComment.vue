<template>
    <form class="p-3" @submit.prevent="addComment">
        <div class="mb-2">
            <textarea 
                v-model="data.body" 
                :required="true" 
                class="form-control"
                cols="30" rows="3"></textarea>
        </div>
        <div class="mb-2">
            <button class="btn btn-sm btn-primary">
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
    import { reactive } from "vue";
    import { useCommentStore } from '../../stores/useCommentStore';

    const store = useCommentStore();

    const data = reactive({
        body: ''
    });

    const props = defineProps({
        post_id: {
            type: Number,
            required: true
        },
        user_id: {
            type: Number,
            required: true
        }
    });

    const addComment = () => {
        store.storeComment(props.post_id,props.user_id,data.body);
        data.body = '';
    }

</script>

<style scoped>
</style>