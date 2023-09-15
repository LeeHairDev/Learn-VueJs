<template>
    <div class="container py-5">
        <h1>404</h1>
        <p>Web hẹo rồi bạn ơi <code>{{ $route.params.notFound }}</code>!!</p>
        <router-link :to="{ name: 'tasks' }">Back to your tasks</router-link>
    </div>
</template>