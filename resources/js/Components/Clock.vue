<script>
export default {
  name: "DigitalClock",
  data() {
    return {
      hours: 0,
      minutes: 0,
      seconds: 0
    }
  },
  mounted() {
    setInterval(() => this.setTime(), 1000)
  },
  methods: {
    setTime() {
      const date = new Date();
      let hours = date.getHours();
      let minutes = date.getMinutes();
      let seconds = date.getSeconds();
      hours = hours <= 9 ? `${hours}`.padStart(2, 0) : hours;
      minutes = minutes <= 9 ? `${minutes}`.padStart(2, 0) : minutes;
      seconds = seconds <= 9 ? `${seconds}`.padStart(2, 0) : seconds;
      this.hours = hours;
      this.minutes = minutes;
      this.seconds = seconds;
    }
  }
}
</script>

<template>
    <div class="LCD">
      <div class="hours">{{ hours }}</div>
      <div class="divider">:</div>
      <div class="minutes">{{ minutes }}</div>
      <div class="divider">:</div>
      <div class="seconds">{{ seconds }}</div>
    </div>
</template>

<style scoped>
.LCD {
  display: flex;
}
.LCD > div {
  font-family: "alarm clock";
  font-size: x-large;
}
</style>