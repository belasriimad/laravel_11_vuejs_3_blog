<template>
  <div class="d-flex justify-content-between align-items-center">
    <span>
        <i class="fas fa-thumbs-up"
            @click="likePost"
            :style="{
                cursor:'pointer'
            }"
        ></i>
    </span>
    <span class="fw-bold mx-2">
        {{ data.postLikes }}
    </span>
    <span>
        <i class="fas fa-thumbs-down"
            @click="disLikePost"
            :style="{
                cursor:'pointer'
            }"
        ></i>
    </span>
  </div>
</template>

<script setup>
    import { onMounted, reactive } from "vue"

    const data = reactive({
        postLikes: 0
    })

    const props = defineProps({
        id: {
            type: Number,
            required: true
        },
        likes: {
            type: Number,
            required: true
        }
    })

    const likePost = async () => {
        try {
            const response = await axios.get(`/api/post/${props.id}/like`);
            data.postLikes += 1
            console.log(response.data)
        } catch (error) {
            console.log(error);
        }
    }

    const disLikePost = async () => {
        try {
            const response = await axios.get(`/api/post/${props.id}/dislike`);
            data.postLikes -= 1
            console.log(response.data)
        } catch (error) {
            console.log(error);
        }
    }

    onMounted(() => data.postLikes = props.likes)
</script>

<style scoped>
</style>