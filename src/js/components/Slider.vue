<template>
    <div class="container-md">
        <div class="slider-wrapper">
            <div class="slider-container">
                <div class="slider-track">
                    <div v-for="item_data in slides" class="slider-item">
                        <div class="row">
                            <div class="col-6 left-part col-visible">
                                <div class="title">{{item_data.title}}</div>
                                <div class="subtitle">{{item_data.subtitle}}</div>
                                <ul>
                                    <li v-for="service in item_data.services">
                                        <span class="text">{{service}}</span>
                                    </li>
                                </ul>
                                <div class="price">
                                    Всего {{item_data.new_price}}₽ <span>{{item_data.old_price}}₽</span>
                                </div>
                            </div>
                            <div class="col-6 right-part">
                                <div class="triangle-block"></div>
                                <img src="/dist/assets/images/background/doctor-working.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-buttons">
                <button class="btn-prev" v-on:click="goPrev()">
                    <img src="/dist/assets/images/Vector-left.png"/>
                </button>
                <div class="slider-number">
                    {{slideNumber}}<span>/{{itemsCount}}</span>
                </div>
                <button class="btn-next" v-on:click="goNext()">
                    <img src="/dist/assets/images/Vector-right.png"/>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data()  {
        return {
            slides: [],
            slidesToShow: 1,
            slidesToScroll: 1,
            itemWidth: 0,
            movePosition: 0,
            itemsCount : 0,
            position: 0,
            slideNumber: 1,
            windowWidth: window.innerWidth,
        }
    },
    mounted(){
        this.getData();
        window.onresize = () => {
            this.windowWidth = window.innerWidth;
        }

    },
    watch:{
        windowWidth(){
            const container = document.querySelector('.slider-container');
            this.itemWidth = container.clientWidth / this.slidesToShow;
            this.getWidth();
        }
    },
    methods:{
        async getData(){
            await axios.get(`/ajax/sliderData.php`).then(response => {
                this.slides = response.data;
            });
            const container = document.querySelector('.slider-container');
            const items = document.querySelectorAll('.slider-item');
            this.itemWidth = container.clientWidth / this.slidesToShow;
            this.movePosition = this.slidesToScroll * this.itemWidth;
            this.itemsCount = items.length;
            await this.getWidth();
            await this.checkBtn();
        },
        getWidth(){
            const items = document.querySelectorAll('.slider-item');
            items.forEach((item) => {
                item.style.minWidth = `${this.itemWidth}px`;
            })
        },
        goNext(){
            const itemsLeft = this.itemsCount - (Math.abs(this.position) + this.slidesToShow * this.itemWidth) / this.itemWidth;
            this.position -= itemsLeft >= this.slidesToScroll ? this.movePosition : itemsLeft * this.itemWidth;
            this.setPosition();
            this.checkBtn();
            this.slideNumber++;
        },
        goPrev(){
            const itemsLeft = Math.abs(this.position) / this.itemWidth;
            this.position += itemsLeft >= this.slidesToScroll ? this.movePosition : itemsLeft * this.itemWidth;
            this.setPosition();
            this.checkBtn();
            this.slideNumber--;
        },
        setPosition(){
            const track = document.querySelector('.slider-track');
            track.style.transform = `translateX(${this.position}px)`;
        },
        checkBtn(){
            const btnPrev = document.querySelector('.btn-prev');
            const btnNext = document.querySelector('.btn-next');
            btnPrev.disabled = this.position === 0;
            btnNext.disabled = this.position <= -(this.itemsCount - this.slidesToShow) * this.itemWidth;
        }


    }
}
</script>
