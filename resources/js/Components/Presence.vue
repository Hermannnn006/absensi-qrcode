<template>
<section class="flex flex-col gap-2 items-center lg:gap-0 lg:items-start lg:flex-row my-10 justify-evenly">
  <div class="max-h-[400px] max-w-[400px] border-solid border-2 border-hijau">
    <qr-stream @decode="onDecode">
      <div style="color: red;" class="frame"></div>
    </qr-stream>
  </div>
  <div class="min-w-[300px] md:min-w-[350px] h-[300px] p-2 rounded border-solid border-2 border-hijau">
    <h1 class="font-medium text-xl -mt-2 text-center">Data scan</h1>
    <div v-if="state.checkMahasiwa" v-for="mhs in state.mahasiswa">
        <p>NIM : {{ mhs.nim }}</p>
        <p>Nama : {{ mhs.name }}</p>
        <p>Kelas : {{ mhs.classroom }}</p>
        <p>{{ presenceInfo }}</p>
    </div>
    <div v-else-if="!state.checkMahasiwa && state.scanedData">
      <p>Data dengan nim {{ state.scanedData }} tidak ditemukan.</p>
    </div>
    <div v-else>
      Tidak ada data scan terbaru.
    </div>
  </div>
</section>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { QrStream } from 'vue3-qr-reader';

const state = reactive({
      scanedData: null,
      checkMahasiwa: false,
      checkPresence: false,
    })
const data = ref({})
const presenceInfo = ref(null)

async function onDecode(data) {
  state.scanedData = await data
  if(state.scanedData){
    state.checkMahasiwa = await checkMahasiswa()
    if(state.checkMahasiwa){
      getMahasiswa()
      state.checkPresence = await checkPresence()
      if(state.checkPresence){
        playSound('https://mychall.000webhostapp.com/berhasil.mp3')
        await postPresence()
        presenceInfo.value = 'Absensi Berhasil'
      } else {
        playSound('https://mychall.000webhostapp.com/kembali.mp3')
        presenceInfo.value = 'Anda Sudah Melakuakan Absensi Hari ini'
      }
    } else {
      playSound('https://mychall.000webhostapp.com/notfound.mp3')
    }
  }
}

async function getMahasiswa() {
  try {
    const response = await axios.get(`/api/mahasiswas/${state.scanedData}`);
    state.mahasiswa = await response.data
  } catch (error) {
    console.log(error);
  }
}

async function postPresence() {
  try {
    let idMhs = await state.mahasiswa.data.id
    await axios.post('/api/presences', {
    mahasiswa_id: idMhs,
    presence_status: 'hadir'
  })
  } catch (error) {
    console.log(error);
  }
}

async function checkMahasiswa() {
  try {
    const response = await axios.get(`/api/check-mahasiswa/${state.scanedData}`);
    return response.data
  } catch (error) {
    console.log(error);
  }
}

async function checkPresence() {
  try {
    const response = await axios.get(`/api/check-presence/${state.scanedData}`);
    return response.data
  } catch (error) {
    console.log(error);
  }
}

function playSound (sound) {
  let audio = new Audio(sound);
  audio.play();
}
</script>

<style scoped>
.frame {
  border-style: solid;
  border-width: 2px;
  border-color: green;
  height: 200px;
  width: 200px;
  position: absolute;
  top: 0px;
  bottom: 0px;
  right: 0px;
  left: 0px;
  margin: auto;
}
</style>