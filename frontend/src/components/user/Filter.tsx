const Filter = () => {
    return (
        <div className="mt-12 flex justify-between">
            <div className="flex gap-6 flex-wrap">
                <select
                    name="type"
                    id=""
                    className="py-2 rounded-2xl text-xs font-medium bg-gray-200 px-3 outline-none"
                >
                    <option value="">Type</option>
                    <option value="physical">Physical</option>
                    <option value="digital">Digital</option>
                </select>

                <input
                    type="text"
                    name="min"
                    id=""
                    placeholder="Min Price"
                    className="text-xs rounded-2xl pl-2 w-24 ring-1 ring-gray-400 px-3 outline-zeta"
                />

                <input
                    type="text"
                    name="max"
                    id=""
                    placeholder="Max Price"
                    className="text-xs rounded-2xl pl-2 w-24 ring-1 ring-gray-400 px-3 outline-zeta"
                />

                <select
                    name="type"
                    id=""
                    className="py-2 rounded-2xl text-xs font-medium bg-gray-200 px-3 outline-none"
                >
                    <option value="">Size</option>
                </select>

                <select
                    name="type"
                    id=""
                    className="py-2 rounded-2xl text-xs font-medium bg-gray-200 px-3 outline-none"
                >
                    <option value="">Type</option>
                </select>

                <select
                    name="type"
                    id=""
                    className="py-2 rounded-2xl text-xs font-medium bg-gray-200 px-3 outline-none"
                >
                    <option value="">Type</option>
                </select>
            </div>
            <div className="">
                <select
                    name="type"
                    id=""
                    className="py-2 rounded-2xl text-xs font-medium bg-white ring-1 ring-gray-400 px-3 outline-none"
                >
                    <option selected >Sort By</option>
                    <option value="">Price (low to high)</option>
                    <option value="">Price (high to low)</option>
                    <option value="">Newest</option>
                    <option value="">Oldest</option>
                </select>
            </div>
        </div>
    );
};

export default Filter;
