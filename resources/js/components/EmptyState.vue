<template>
  <div class="flex items-center justify-center flex-col flex-1 mt-5">
    <p class="mb-6 text-gray-500">
     {{message}}
    </p>
    <div class="flex flex-col w-3/4 mx-auto dark:bg-gray-800">
      <img
        :src="'/images/'+imageName"
        alt="Not tickets found"
        class="object-cover w-full rounded-lg"
        width="100"
      />
    </div>
  </div>
</template>

<script>
export default {
  props:['imageName', "message"]
}
</script>

