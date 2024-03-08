<template>
    <div class="container">
        <h1 class="mt-3 text-center">Customer Details</h1>
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text">ชื่อ</span>
                <input type="text" class="form-control" placeholder="ป้อนชื่อจริงของคุณ" v-model="form.fname" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">นามสกุล</span>
                <input type="text" class="form-control" placeholder="ป้อนนามสกุลของคุณ" v-model="form.lname" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">อีเมล</span>
                <input type="email" class="form-control" placeholder="ป้อนอีเมลของคุณ" v-model="form.email" readonly>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">เบอร์</span>
                <input type="tel" class="form-control" placeholder="ป้อนเบอร์โทรศัพท์ของคุณ" minlength="12"
                    maxlength="12" v-model="form.phone" readonly>
            </div>
            <div class="mb-3">
                <Link href="/" as="button" class="btn btn-dark" type="button">กลับ</Link>
            </div>
        </form>
    </div>
</template>
<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    customer: Object,
    errors: Object
})
const form = ref({
    fname: props.customer.fname, // Access props directly
    lname: props.customer.lname,
    email: props.customer.email,
    phone: props.customer.phone.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3'),
});
</script>
