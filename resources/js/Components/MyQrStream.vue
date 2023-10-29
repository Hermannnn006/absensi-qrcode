<template>
<h1 class="text-4xl text-center font-semibold">Arahkan qr code kearah kamera untuk melakukan absensi</h1>
<section class="flex flex-col gap-2 items-center lg:gap-0 lg:items-start lg:flex-row my-10 justify-evenly">
  <div class="max-h-[400px] max-w-[400px] border-solid border-2 border-indigo-300">
    <qr-stream @decode="onDecode">
      <div style="color: red;" class="frame"></div>
    </qr-stream>
  </div>
  <div class="min-w-[300px] md:min-w-[350px] h-[300px] p-2 rounded border-solid border-2 border-indigo-300">
    <h1 class="font-medium text-xl -mt-2 text-center">Data Absensi Terbaru</h1>
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
<section>
  <h1 class="text-2xl font-medium text-center">Data absensi terbaru</h1>
  <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
              <table class="min-w-full text-center text-sm font-light">
                  <thead class="border-b border-sky-200 bg-sky-100 text-slate-900">
                      <tr>
                          <th scope="col" class="whitespace-nowrap px-6 py-4 font-medium">No</th>
                          <th scope="col" class="whitespace-nowrap px-6 py-4 font-medium">Nim</th>
                          <th scope="col" class="whitespace-nowrap px-6 py-4 font-medium">Nama</th>
                          <th scope="col" class="whitespace-nowrap px-6 py-4 font-medium">Kelas</th>
                          <th scope="col" class="whitespace-nowrap px-6 py-4 font-medium">Waktu</th>
                        </tr>
                  </thead>
                  <tbody v-for="(presence, index) in data" :key="data.id">
                      <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ ++index }}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{ presence.nim }}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{ presence.name }}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{ presence.classroom }}</td>
                        <td class="whitespace-nowrap  px-6 py-4">{{ presence.created_at }}</td>
                      </tr>
                  </tbody>
              </table>
              </div>
          </div>
      </div>
  </div>
</section>
</template>

<script setup>
import { reactive, ref, onBeforeMount } from 'vue';
import { QrStream } from 'vue3-qr-reader';

const state = reactive({
      scanedData: null,
      mahasiswa: null,
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
        getPresences()
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

async function getPresences() {
    try {
    const response = await axios.get(`/api/presences`);
    data.value = await response.data.data
  } catch (error) {
    console.log(error);
  }
}

function playSound (sound) {
  let audio = new Audio(sound);
  audio.play();
}

onBeforeMount(() => getPresences())
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