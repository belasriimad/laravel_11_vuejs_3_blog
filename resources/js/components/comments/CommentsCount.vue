<template>
  <h4 class="my-2">
    Comments ({{ store.comments.length }})
  </h4>
</template>

<script setup>
    import { useCommentStore } from '../../stores/useCommentStore';

    const store = useCommentStore();
</script>

<style>

</style>