import Link from "next/link";
import Image from "next/image";

const ProductList = () => {
  return (
    <div className="mt-12 flex gap-x-8 gap-y-16 justify-between flex-wrap">
      <Link href="/test" className="w-full flex flex-col gap-4 sm:w-[45%] lg:[22%]">
        <div className="relative w-full h-80">
            <Image
                src="https://images.pexels.com/photos/12922525/pexels-photo-12922525.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25vw"
                className="absolute object-cover rounded-md z-10 hover:opacity-0 transition-opacity easy duration-500"
            />

            <Image
                src="https://images.pexels.com/photos/27200898/pexels-photo-27200898/free-photo-of-thien-nhien-th-i-trang-dan-ong-mua-he.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25v"
                className="absolute object-cover rounded-md"
            />
        </div>
        <div className="flex justify-between">
            <span className="font-medium">Product Name</span>
            <span className="font-semibold">$59</span>
        </div>
        <div className="text-sm text-gray-500">Description</div>
        <button className="rounded-2xl ring-1 ring-zeta text-zeta w-max py-2 px-4 text-xs hover:bg-zeta hover:text-white">Add to cart</button>
      </Link>

      <Link href="/test" className="w-full flex flex-col gap-4 sm:w-[45%] lg:[22%]">
        <div className="relative w-full h-80">
            <Image
                src="https://images.pexels.com/photos/12922525/pexels-photo-12922525.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25vw"
                className="absolute object-cover rounded-md z-10 hover:opacity-0 transition-opacity easy duration-500"
            />

            <Image
                src="https://images.pexels.com/photos/27200898/pexels-photo-27200898/free-photo-of-thien-nhien-th-i-trang-dan-ong-mua-he.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25v"
                className="absolute object-cover rounded-md"
            />
        </div>
        <div className="flex justify-between">
            <span className="font-medium">Product Name</span>
            <span className="font-semibold">$59</span>
        </div>
        <div className="text-sm text-gray-500">Description</div>
        <button className="rounded-2xl ring-1 ring-zeta text-zeta w-max py-2 px-4 text-xs hover:bg-zeta hover:text-white">Add to cart</button>
      </Link>
      
      <Link href="/test" className="w-full flex flex-col gap-4 sm:w-[45%] lg:[22%]">
        <div className="relative w-full h-80">
            <Image
                src="https://images.pexels.com/photos/12922525/pexels-photo-12922525.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25vw"
                className="absolute object-cover rounded-md z-10 hover:opacity-0 transition-opacity easy duration-500"
            />

            <Image
                src="https://images.pexels.com/photos/27200898/pexels-photo-27200898/free-photo-of-thien-nhien-th-i-trang-dan-ong-mua-he.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25v"
                className="absolute object-cover rounded-md"
            />
        </div>
        <div className="flex justify-between">
            <span className="font-medium">Product Name</span>
            <span className="font-semibold">$59</span>
        </div>
        <div className="text-sm text-gray-500">Description</div>
        <button className="rounded-2xl ring-1 ring-zeta text-zeta w-max py-2 px-4 text-xs hover:bg-zeta hover:text-white">Add to cart</button>
      </Link>
      
      <Link href="/test" className="w-full flex flex-col gap-4 sm:w-[45%] lg:[22%]">
        <div className="relative w-full h-80">
            <Image
                src="https://images.pexels.com/photos/12922525/pexels-photo-12922525.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25vw"
                className="absolute object-cover rounded-md z-10 hover:opacity-0 transition-opacity easy duration-500"
            />

            <Image
                src="https://images.pexels.com/photos/27200898/pexels-photo-27200898/free-photo-of-thien-nhien-th-i-trang-dan-ong-mua-he.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt=""
                fill
                sizes="25v"
                className="absolute object-cover rounded-md"
            />
        </div>
        <div className="flex justify-between">
            <span className="font-medium">Product Name</span>
            <span className="font-semibold">$59</span>
        </div>
        <div className="text-sm text-gray-500">Description</div>
        <button className="rounded-2xl ring-1 ring-zeta text-zeta w-max py-2 px-4 text-xs hover:bg-zeta hover:text-white">Add to cart</button>
      </Link>
    </div>
  );
};

export default ProductList;
