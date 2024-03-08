<template>
    <div class="container">
        <h1 class="mt-3 text-center">Create Customer</h1>
        <form @submit.prevent="submit">
            <div :class="['input-group', { 'mb-3': !errors.fname }]">
                <span class="input-group-text">ชื่อ</span>
                <input type="text" class="form-control" placeholder="ป้อนชื่อจริงของคุณ" v-model="form.fname">
            </div>
            <div v-if="errors.fname" class="text-danger">{{ errors.fname }}</div>
            <div :class="['input-group', { 'mb-3': !errors.lname }]">
                <span class="input-group-text">นามสกุล</span>
                <input type="text" class="form-control" placeholder="ป้อนนามสกุลของคุณ" v-model="form.lname">
            </div>
            <div v-if="errors.lname" class="text-danger">{{ errors.lname }}</div>
            <div :class="['input-group', { 'mb-3': !errors.email }]">
                <span class="input-group-text">อีเมล</span>
                <input type="email" class="form-control" placeholder="ป้อนอีเมลของคุณ" v-model="form.email">
            </div>
            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
            <div :class="['input-group', { 'mb-3': !errors.lname }]">
                <span class="input-group-text" id="inputGroup-sizing-default">เบอร์</span>
                <input type="tel" class="form-control" placeholder="ป้อนเบอร์โทรศัพท์ของคุณ" :value="formattedPhone"
                    @input="updatePhone($event.target.value)" minlength="12" maxlength="12">
            </div>
            <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">เพิ่ม</button>
                <Link href="/" as="button" class="btn btn-dark ms-2" type="button">กลับ</Link>
            </div>
        </form>
    </div>
</template>
<script setup>
import { ref, computed, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
defineProps({ errors: Object })
const form = ref({
    fname: '',
    lname: '',
    email: '',
    phone: '',
});
const formattedPhone = computed(() => {
    const phone = form.value.phone;
    if (phone.length === 3) {
        return phone + '-';
    } else if (phone.length === 7) {
        return phone + '-';
    } else {
        return phone;
    }
});
watch(form, (newValue, oldValue) => {
    if (newValue.phone.length > 12) {
        form.value.phone = oldValue.phone;
    }
});
const updatePhone = (value) => {
    form.value.phone = value;
};
const submit = async () => {
    form.value.phone = form.value.phone.replace(/-/g, '');
    try {
        await router.post('/add_customer', form.value);
        console.log('Customer added successfully');
    } catch (error) {
        console.error('Error adding customer:', error);
    }
}
</script>
