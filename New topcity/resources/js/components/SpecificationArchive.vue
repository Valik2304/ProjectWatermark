<template>
            <div class="accordion__card card border-active">
                <div class="card__header card-header row" id="headingOne">
                    <div class="col-1">
                        <button class="folder-item item" data-toggle="collapse" :data-target="'#collapse' + idRow" aria-expanded="true" :aria-controls="'collapse' + idRow">
                            <svg class="folder-item__svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" width="31px" height="25px" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" xml:space="preserve">
                                <path d="M57.49,21.5H55v-9H26.515l-5-7H2.732C1.226,5.5,0,6.726,0,8.232v43.687l0.006,0c-0.005,0.563,0.17,1.114,0.522,1.575 C1.018,54.134,1.76,54.5,2.565,54.5h44.759c1.156,0,2.174-0.779,2.45-1.813L60,24.649v-0.177C60,22.75,58.944,21.5,57.49,21.5z M53,14.5v7h-8v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1 s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-5v-3c0-0.553-0.448-1-1-1s-1,0.447-1,1v3h-2.269 c-0.143,0-0.284,0.012-0.422,0.035c-0.974,0.162-1.786,0.872-2.028,1.778l-0.317,0.87L5,37.793V20.5h6v-6h16.943H53z M6.414,18.5 L9,15.914V18.5H6.414z M2,8.232C2,7.828,2.329,7.5,2.732,7.5h17.753l3.571,5H9.586L3,19.086v24.085l-1,2.728V8.232z M47.869,52.083 c-0.066,0.245-0.291,0.417-0.545,0.417H2.565c-0.243,0-0.385-0.139-0.448-0.222c-0.063-0.082-0.16-0.256-0.123-0.408L3,49.112v0.001 l9.16-25.114l0.026-0.082c0.066-0.245,0.291-0.417,0.545-0.417H55h2.49c0.38,0,0.477,0.546,0.502,0.819L47.869,52.083z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                        <p class="product-items item">
                            {{ nameFolder }} (<span>{{ itemData.length }} {{ translate_spec.piece }}</span>)
                        </p>
                    </div>
                    <div class="dateCreate col-2">
                        <p class="date-item item">{{ dateCreate }}</p>
                    </div>

                    <div class="col-1">
                        <button @click="SwitchToSpecification(idRow,indexArchive)" class="delete__button">
                            <svg fill="#009615" xmlns="http://www.w3.org/2000/svg" width="14" height="15.969" viewBox="0 0 14 15.969">
                                <path id="Refresh" class="cls-1" d="M1446.96,582.394a7.057,7.057,0,0,1-13.96-1.251,6.908,6.908,0,0,1,7-6.857v-1.11a1.135,1.135,0,0,1,.72-1.054,1.179,1.179,0,0,1,1.27.248l2.33,2.28a1.1,1.1,0,0,1,0,1.613l-2.33,2.28a1.153,1.153,0,0,1-.63.314h-0.37a1.212,1.212,0,0,1-.27-0.067,1.132,1.132,0,0,1-.72-1.053v-1.166a4.591,4.591,0,0,0-4.65,4.572,4.641,4.641,0,0,0,4.7,4.571,4.773,4.773,0,0,0,4.62-3.429v-1.142a1.165,1.165,0,0,1,2.33,0V582.4C1446.99,582.4,1446.97,582.4,1446.96,582.394Z" transform="translate(-1433 -572.031)"/>
                            </svg>
                        </button>
                    </div>

                </div>

                <div :id="'collapse' + idRow " class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <!--show-->
                    <div class="card-body">

                        <div v-for="(item, index) in itemData" :key="item.article" class="form-check">
                            <label class="form-check-label checkbox-container" :for="'check'  + item.article">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="card-body__text">{{ item.article }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-body__text" :title="item.name">{{ item.name }}</p>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
</template>
<script>
    import $ from 'jquery';
    export default {
        props: ['nameFolder', 'dateCreate', 'idRow', 'itemData','indexArchive','translate_spec'],
        data() {
            return {

            }
        },
        methods: {
            SwitchToSpecification(id,indexArchive) {
                $.ajax({
                    type: "POST",
                    url: 'specification-menu/switchToSpecification/'+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success: (response) => {
                        console.log(response);
                        console.log(indexArchive);
                        this.$emit('SwitchToSpecificationAction',response.specification,indexArchive);
                    },
                    error: function (response) {
                        alert("ERROR");
                        console.log(response);

                    }
                });

            }
        }
    }
</script>