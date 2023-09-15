import { defineStore } from "pinia";
import { reactive, ref, computed } from "vue";
import { allTasks, createTask,  updateTask, completeTask, removeTask  } from "../http/task-api";

const tmp = {
  state: () => ({}),
  getters: {},
  actions: {},
};
export const useTaskStore = defineStore("taskStore", () => {
  const tasks = ref([]);
  const uncompletedTasks = computed(() =>
    tasks.value.filter((task) => !task.is_completed)
  );
  const completedTasks = computed(() =>
    tasks.value.filter((task) => task.is_completed)
  );

  const handleAddedTask = async (newTask) => {
    const { data: createdTask } = await createTask(newTask);
    tasks.value.unshift(createdTask.data);
  };

  const handleUpdateTask = async (task) => {
    const { data: updatedTask } = await updateTask(task.id, {
      name: task.name,
    });
    const currentTask = tasks.value.find((item) => item.id === task.id);
    currentTask.name = updatedTask.data.name;
  };

  const handleCompletedTask = async (task) => {
    const { data: updatedTask } = await completeTask(task.id, {
      is_completed: task.is_completed,
    });
    const currentTask = tasks.value.find((item) => item.id === task.id);
    currentTask.is_completed = updatedTask.data.is_completed;
  };

  const handleRemovedTask = async (task) => {
    await removeTask(task.id);
    const index = tasks.value.findIndex((item) => item.id === task.id);
    tasks.value.splice(index, 1);
  };

  const fetchAllTasks = async () => {
    const { data } = await allTasks();
    tasks.value = data.data;
  };
  return {
    tasks,
    completedTasks,
    uncompletedTasks,
    fetchAllTasks,
    handleAddedTask,
    handleUpdateTask,
    handleRemovedTask,
    handleCompletedTask
  };
});
