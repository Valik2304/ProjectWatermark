<template>
        <div>
            <span v-if="this.timer" :style="
`position: absolute;
top: 0;
right: 0;
height: 3px;
background: #f50057;
transition: width 1s linear;
width: ${(timeCount-1)/5*100}%;
`"></span>
            <div class="col-lg-1 col-sm-12 col-12">
                <img class="item__image" :src="cartItem.image" alt="">
            </div>
            <div class="col-lg-3 col-sm-12 col-12">
                <p class="item__dis bold">{{ cartItem.name }}</p>
                <p class="item__dis">{{ cartItem.category }}</p>
            </div>
            <div class="item__num col-lg-3 col-sm-12 col-12">{{cartItem.article}}</div>
            <div class="item__summ col-lg-2 col-sm-12 col-12">
                <button @click="changeCount(cartItem, -1, cartItem.rowId)" class="summ--minus">
                    <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 400 400" xml:space="preserve">
                                         <g>
                                             <path d="M199.991,0C89.715,0,0.002,89.72,0.002,200c0,110.279,89.713,200,199.989,200c110.281,0,200.007-89.721,200.007-200
                                                 C399.998,89.72,310.272,0,199.991,0z M199.991,373.77c-95.81,0-173.759-77.953-173.759-173.77
                                                 c0-95.817,77.949-173.77,173.759-173.77c95.821,0,173.775,77.953,173.775,173.77C373.768,295.816,295.812,373.77,199.991,373.77z"
                                             />
                                             <path d="M279.476,186.884l-158.958,0.003c-7.242,0-13.115,5.873-13.115,13.115c0,7.243,5.873,13.116,13.115,13.116l158.958-0.005
                                                 c7.243,0,13.115-5.872,13.115-13.114S286.719,186.884,279.476,186.884z"/>
                                         </g>
                                        </svg>
                </button>
                <input @input="changeCount(cartItem, 0)" v-model.number="cartItem.qty"
                       class="summ--input"
                       type="text" name="" id="">
                <button @click="changeCount(cartItem, +1, cartItem.rowId)" class="summ--plus">
                    <svg fill="#A9A9A9" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 612 612" xml:space="preserve">
                                            <g>
                                                <g id="_x38__3_">
                                                    <g>
                                                        <path d="M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-137.012,306-306S475.008,0,306,0z M306,573.75
                                                            C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75
                                                            C573.75,453.875,453.875,573.75,306,573.75z M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125
                                                            c-10.557,0-19.125,8.568-19.125,19.125v95.625H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125
                                                            h95.625v95.625c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625
                                                            c10.557,0,19.125-8.568,19.125-19.125C439.875,295.443,431.307,286.875,420.75,286.875z"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                </button>
            </div>
            <div class="item__base-price col-lg-1 col-sm-12 col-12">
                <span v-if="cartItem.price !== 0" class="bold">{{ cartItem.price }} <span class="bold">{{ this.translations.UAH}}</span></span>
                <span v-else></span>
            </div>
            <div class="item__final-price col-lg-1 col-sm-12 col-12">
                <span v-if="cartItem.price !== 0" class="bold blue">{{( cartItem.price * cartItem.qty).toFixed(2) }} <span class="bold blue">{{ this.translations.UAH}}</span></span>
                <span v-else>{{ this.translations.on_request}}</span>
            </div>
            <button @click="cancelTimer($event)" type="button" :class="{'item__undo--active': timer}" class="item__undo">
                <svg fill="#009615" xmlns="http://www.w3.org/2000/svg" width="14" height="15.969"
                     viewBox="0 0 14 15.969">
                    <path id="Refresh" class="cls-1"
                          d="M1446.96,582.394a7.057,7.057,0,0,1-13.96-1.251,6.908,6.908,0,0,1,7-6.857v-1.11a1.135,1.135,0,0,1,.72-1.054,1.179,1.179,0,0,1,1.27.248l2.33,2.28a1.1,1.1,0,0,1,0,1.613l-2.33,2.28a1.153,1.153,0,0,1-.63.314h-0.37a1.212,1.212,0,0,1-.27-0.067,1.132,1.132,0,0,1-.72-1.053v-1.166a4.591,4.591,0,0,0-4.65,4.572,4.641,4.641,0,0,0,4.7,4.571,4.773,4.773,0,0,0,4.62-3.429v-1.142a1.165,1.165,0,0,1,2.33,0V582.4C1446.99,582.4,1446.97,582.4,1446.96,582.394Z"
                          transform="translate(-1433 -572.031)"/>
                </svg>
            </button>
            <button v-if="!timer" @click="del(cartItem, $event)" class="item__delete" type="button">
                <svg  fill="#8f8f8f" xmlns="http://www.w3.org/2000/svg" width="12.97" height="13"
                     viewBox="0 0 12.97 13">
                    <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1"
                          d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z"
                          transform="translate(-1529.03 -230)"/>
                </svg>
            </button>
            <button v-else @click="frcdDel(cartItem, $event)" class="item__delete" type="button">
                <svg  fill="#8f8f8f" xmlns="http://www.w3.org/2000/svg" width="12.97" height="13"
                      viewBox="0 0 12.97 13">
                    <path id="multiply_copy_копия" data-name="multiply copy копия" class="cls-1"
                          d="M1540.75,242.872l-5.26-5.258-5.25,5.258a0.406,0.406,0,0,1-.57,0l-0.56-.561a0.407,0.407,0,0,1,0-.562l5.26-5.258-5.26-5.258a0.407,0.407,0,0,1,0-.562l0.56-.562a0.406,0.406,0,0,1,.57,0l5.25,5.257,5.26-5.257a0.394,0.394,0,0,1,.56,0l0.57,0.562a0.407,0.407,0,0,1,0,.562l-5.26,5.258,5.26,5.258a0.407,0.407,0,0,1,0,.562l-0.57.561A0.394,0.394,0,0,1,1540.75,242.872Z"
                          transform="translate(-1529.03 -230)"/>
                </svg>
            </button>
        </div>
</template>
<script>
    import $ from 'jquery';

    let timer = null;

    export default {
        props: ['cartItem','recalculate', 'processDelete', 'translations','ajax_url'],
        data() {
            return {
                timeCount: 6,
                timer: null,
                baseUrl: $('#base_url').attr("content")
            }
        },
        methods: {
            frcdDel(cartItem, event){
                this.timeCount  = 1;
                let domCardRow = event.currentTarget.closest('.js-basket-item');
                this.processDelete(cartItem,domCardRow);

                clearInterval(this.timer);
            },
            del(cartItem, event) {
                let domCardRow = event.currentTarget.closest('.js-basket-item');
                $(domCardRow).addClass('i_will_remove');
                $(event.currentTarget).closest('.js-basket-item').find('.item__undo').addClass('item__undo--active');

                this.timeCount= 6;
                setTimeout(()=>{
                    this.timeCount -= 1;
                }, 10)
                this.timer = setInterval( ()=> {
                    this.timeCount -= 1;
                    if (this.timeCount === 0) {
                        this.processDelete(cartItem,domCardRow);
                        clearInterval(this.timer);
                    }
                }, 1000);
            },
            changeCount(item, iterator) {
                item.qty += iterator;
                if (item.qty <= 1) {
                    item.qty = 1;
                }
                //ajax
                let url = this.ajax_url + '/' + item.rowId;
                $.ajax({
                    url: url,
                    method: 'PATCH',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    data: {quantity: item.qty}
                }).then( (response) =>{
                    this.recalculate()
                });
                console.log(item.qty);
            },
            isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                console.log(evt);
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    this.recalculate();
                    evt.preventDefault();
                } else {
                    this.recalculate();
                    return true;
                }
            },
            cancelTimer(event) {
                if (this.timer) {
                    clearInterval(this.timer);
                    this.timer = null;
                    this.timeCount= 6;
                    let domCardRow = event.currentTarget.closest('.js-basket-item');
                    $(domCardRow).removeClass('i_will_remove');
                    $(event.currentTarget).closest('.js-basket-item').find('.item__undo').removeClass('item__undo--active');
                }

            },
        }
    }
</script>