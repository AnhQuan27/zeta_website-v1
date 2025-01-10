'use client'
import Image from "next/image";
import { useState } from "react";

const images = [
    {
        id: 1,
        url: "https://images.pexels.com/photos/29399294/pexels-photo-29399294.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    },
    {
        id: 2,
        url: "https://images.pexels.com/photos/14394832/pexels-photo-14394832.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    },
    {
        id: 3,
        url: "https://images.pexels.com/photos/30148776/pexels-photo-30148776/free-photo-of-hoa-cuc-mau-h-ng-trong-d-ng-c-t-nhien.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    },
    {
        id: 4,
        url: "https://images.pexels.com/photos/7516968/pexels-photo-7516968.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    }
];

const ProductImages = () => {
    const [index, setIndex] = useState(0);
    return (
        <div className="">
            <div className="h-[500px] relative">
                <Image
                    src={images[index].url}
                    alt=""
                    fill
                    sizes="50vw"
                    className="object-cover rounded-md"
                />
            </div>
            <div className="flex justify-start gap-4 mt-8">
                {images.map((image, i) => (
                    <div 
                        className="w-1/4 h-32 relative gap-4 mt-8 cursor-pointer"
                        key={image.id}
                        onClick={() => setIndex(i)}
                    >
                        <Image
                            src={image.url}
                            alt=""
                            fill
                            sizes="30vw"
                            className="object-cover rounded-md"
                        />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ProductImages;
