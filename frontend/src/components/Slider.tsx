"use client";

import Link from "next/link";
import Image from "next/image";
import { useEffect, useState } from "react";

const slides = [
  {
    id: 1,
    title: "Slide 1",
    description: "Description 1",
    img: "https://images.pexels.com/photos/29853434/pexels-photo-29853434/free-photo-of-co-gai-tu-i-teen-tr-t-van-t-i-urban-skatepark-outdoors.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    url: "/",
    bg: "bg-gradient-to-r from-yellow-50 to-pick-50",
  },
  {
    id: 2,
    title: "Slide 2",
    description: "Description 2",
    img: "https://images.pexels.com/photos/29656484/pexels-photo-29656484/free-photo-of-ng-i-dan-ong-sanh-di-u-v-i-tach-ca-phe-trong-b-c-chan-dung-d-n-s-c.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    url: "/",
    bg: "bg-gradient-to-r from-yellow-50 to-pick-50",
  },
  {
    id: 3,
    title: "Slide 3",
    description: "Description 3",
    img: "https://images.pexels.com/photos/29768361/pexels-photo-29768361.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    url: "/",
    bg: "bg-gradient-to-r from-yellow-50 to-pick-50",
  },
  {
    id: 4,
    title: "Slide 4",
    description: "Description 4",
    img: "https://images.pexels.com/photos/29803460/pexels-photo-29803460/free-photo-of-nha-th-slovakia-quy-n-ru-gi-a-nh-ng-ng-n-nui-d-p-nh-tranh-v.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
    url: "/",
    bg: "bg-gradient-to-r from-yellow-50 to-pick-50",
  },
];

const Slider = () => {
  
    const [current, setCurrent] = useState(0);

    // useEffect(() => {
    //     const interval = setInterval(() => {
    //         setCurrent(prev=>(prev == slides.length - 1 ? 0 : prev + 1))
    //     }, 3000)
    //     return () => clearInterval(interval);
    // }, [])

    return (
        <div className="h-[calc(100vh-80px)] overflow-hidden">
            <div className="w-max h-full flex transition-all ease-in-out duration-1000"
                style={{ transform: `translateX(-${current * 100}vw)` }}
            >
            {slides.map((slide) => (
                <div
                    className={`${slide.bg} w-screen h-full flex flex-col gap-16 xl:flex-row`}
                    key={slide.id}
                >
                <div className="h-1/2 xl:w-1/2 xl:h-full flex flex-col items-center justify-center gap-8 2xl:gap-12 text-center">
                    <h2 className="text xl lg:text-3xl 2xl:text-5xl">
                        {slide.description}
                    </h2>
                    <h1 className="text-5xl lg:text-6xl 2xl:text-8xl">
                        {slide.title}
                    </h1>
                    <Link href={slide.url}>
                        <button className="rounded-md bg-black text-white px-4 py-3">
                        Shop now
                        </button>
                    </Link>
                </div>

                <div className="h-1/2 xl:w-1/2 xl:h-full relative">
                    <Image
                        src={slide.img}
                        alt=""
                        fill
                        sizes="100%"
                        className="object-cover"
                    />
                </div>
            </div>
            ))}
        </div>
        <div className="absolute m-auto left-1/2 bottom-8 flex gap-4">
            {slides.map((slide, index) => (
                <div
                    className={`w-3 h-3 rounded-full ring-1 ring-gray-600 cursor-pointer flex items-center justify-center ${
                    current === index ? "scale-150" : ""
                    }`}
                    key={slide.id}
                    onClick={() => setCurrent(index)}
                >
                {current == index && (
                <div className="w-[6px] h-[6px] bg-gray-600 rounded-full"></div>
                )}
            </div>
            ))}
        </div>
        </div>
    );
};

export default Slider;
