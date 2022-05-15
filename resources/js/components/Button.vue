<template>
  <button
    class="
      flex
      items-center
      justify-between
      px-4
      py-2
      text-sm
      font-medium
      leading-5
      text-white
      transition-colors
      rounded-lg
      duration-150
      border border-transparent
      focus:outline-none
    "
    @click="buttonClicked"
  >
    <slot> </slot>
  </button>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    buttonClicked() {
      this.$emit("clicked");
    },
  },
};
</script>