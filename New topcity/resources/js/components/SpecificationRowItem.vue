<template>
    <div class="form-check">
        <label class="form-check-label checkbox-container" :for="'check'  + id">
            <input class="form-check-input" type="checkbox" value="" :name="'check' + id" :id="'check' + id" v-model="checkItems[[itemNumber,product_id,category_id]]" >
            <span class="checkmark"></span>
            <div class="row">
                <div class="col-4">
                    <p class="card-body__text">{{ itemNumber }}</p>
                </div>
                <div class="col-6">
                    <p class="card-body__text" :title="itemName">{{ itemName }}</p>
                </div>
                <div class="col-2">
                    <button @click="deleteItem(product_id,specification_id)" class="card-body__close-btn" :disabled="disable">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                             viewBox="0 0 12 12">
                            <g>
                                <g>
                                    <path fill="#8f8f8f" d="M.01 1.607L1.607.01 6 4.403 10.392.01l1.597 1.597L7.597 6l4.392 4.392-1.597 1.597L6 7.597l-4.393 4.392L.01 10.393 4.403 6z"/>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </label>
    </div>
</template>
<script>
    export default {
        props: ['itemName', 'itemNumber', 'id','product_id','specification_id', 'checkItems','category_id'],
        data() {
            return {
                disable:false
            }
        },
        methods: {
            deleteItem(product_id,specification_id) {
                this.disable =true;
                this.$emit('delete',product_id,specification_id);
            },
        }

    }
</script>