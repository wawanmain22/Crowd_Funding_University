<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue';
import LoginRegisterForm from './LoginRegister.vue'; // Import form component

const props = defineProps({
  show: {
    type: Boolean,
    default: false,
  },
  closeable: {
    type: Boolean,
    default: true,
  },
  formType: {
    type: String,
    default: 'login',
  },
});

const emit = defineEmits(['close']);
const showSlot = ref(props.show);

watch(
  () => props.show,
  () => {
    if (props.show) {
      document.body.style.overflow = 'hidden';
      showSlot.value = true;
    } else {
      document.body.style.overflow = '';
      showSlot.value = false;
    }
  },
);

const close = () => {
  if (props.closeable) {
    emit('close');
  }
};

const closeOnEscape = (e) => {
  if (e.key === 'Escape') {
    e.preventDefault();
    close();
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));
</script>

<template>
  <!-- Modal Background -->
  <div
    v-show="showSlot"
    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75"
    @click="close"
  >
    <!-- Modal content -->
    <div
      class="bg-white rounded-lg shadow-xl overflow-hidden w-full sm:w-96 p-6"
      @click.stop
    >
    <slot></slot>
    </div>
  </div>
</template>
