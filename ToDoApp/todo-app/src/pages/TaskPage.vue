<template>
  <main style="min-height: 50vh; margin-top: 2rem">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <!-- Add new Task -->

          <NewTask/>

          <!-- List of tasks -->

          <!-- uncompleted tasks  -->

          <Tasks :tasks="uncompletedTasks"/>

          <!-- show toggle button -->
          <div class="text-center my-3" v-show="showToggleCompletedBtn">
            <button
              class="btn btn-sm btn-secondary"
              @click="($event) => (showcompletedTasks = !showcompletedTasks)"
            >
              <span v-if="!showcompletedTasks">Show completed</span>
              <span v-else="showcompletedTasks">Hide completed</span>
            </button>
          </div>

          <!-- completed tasks  -->

         <Tasks :tasks="completedTasks" :show="completedTasksVisible && showcompletedTasks" />
        </div>
      </div>
    </div>
  </main>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import { storeToRefs } from "pinia"
import { useTaskStore } from "../stores/task"
import Tasks from "../components/tasks/Tasks.vue";
import NewTask from "../components/tasks/NewTask.vue";

const store = useTaskStore(); 
const { completedTasks, uncompletedTasks } = storeToRefs(store)
const { fetchAllTasks } = store




onMounted(async () => {
  await fetchAllTasks();
});


const showToggleCompletedBtn = computed(
  () => uncompletedTasks.value.length > 0 && completedTasks.value.length > 0
);
const completedTasksVisible = computed(
  () => uncompletedTasks.value.length === 0 || completedTasks.value.length > 0
);
const showcompletedTasks = ref(false || completedTasksVisible.value);


</script>
