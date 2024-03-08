<template>
    <div class="container">
        <h1 class="mt-3 text-center">Customer List</h1>
        <div class="d-flex justify-content-end">
            <Link href="/customers/create" as="button" class="btn btn-success" type="button">เพิ่มลูกค้า</Link>
        </div>
        <table id="customerTable" class="table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>เบอร์โทร</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(customer, index) in customers" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ customer.fname }} {{ customer.lname }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone }}</td>
                    <td>
                        <button @click.prevent="viewCustomer(customer.id)" class="btn btn-info">ดูข้อมูล</button>
                        <button @click.prevent="editCustomer(customer.id)"
                            class="btn btn-warning ms-2">แก้ไขข้อมูล</button>
                        <button @click.prevent="confirmDelete(customer.id)"
                            class="btn btn-danger ms-2">ลบข้อมูล</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import $ from 'jquery';

const props = defineProps({ customers: Object });

onMounted(() => {
    $('#customerTable').DataTable();
});

const editCustomer = (id) => {
    router.get(`/customers/edit/${id}`);
}

const viewCustomer = (id) => {
    router.get(`/customers/detail/${id}`);
}

const deleteCustomer = (id) => {
    router.delete(`/customers/delete/${id}`);
}

const confirmDelete = (id) => {
    if (confirm('คุณต้องการลบข้อมูลลูกค้านี้ใช่หรือไม่?')) {
        deleteCustomer(id);
    }
}
</script>
