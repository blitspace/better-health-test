import React from "react";
import { useContext } from "react";
import Filters from "./Filters";
import List from "./List";
import Search from "./Search";
import { DataContext } from "./context/DataContext";
import { normalizeText } from "./utils";


const Browser = ({ title, description }) => {
    const dataContext = useContext(DataContext);

    const filteredList = dataContext.data.filter(
        (item) => {
            const catFilter = dataContext.activeCat === "all"
                || item.category.toLowerCase().includes(dataContext.activeCat.toLowerCase());
            const textFilter = dataContext.textFilter === '' || (
                item.name.toLowerCase().includes(dataContext.textFilter.toLowerCase())
                    || item.description.toLowerCase().includes(dataContext.textFilter.toLowerCase())
            );

            const technologyFilter = dataContext.activeTechnologyFilter === ''
                || normalizeText(item.technology).includes(dataContext.activeTechnologyFilter.toLowerCase());
            const subTechnologyFilter = dataContext.activeSubTechnologyFilter === ''
                || normalizeText(item.sub_technology).includes(dataContext.activeSubTechnologyFilter.toLowerCase());
            const vendorFilter = dataContext.activeVendorFilter === ''
                || normalizeText(item.vendor).includes(dataContext.activeVendorFilter.toLowerCase());
            const productTypeFilter = dataContext.activeProductTypeFilter === ''
                || normalizeText(item.product_type).includes(dataContext.activeProductTypeFilter.toLowerCase());

            return catFilter && textFilter && technologyFilter && subTechnologyFilter && vendorFilter && productTypeFilter;
        }
    );

    return (
        <div>
            <div className="mb-8">
                <div className="flex flex-row items-center mb-4">
                    <div className="basis-2/3">
                        <div className="h1 text-2xl font-bold">{title}</div>
                    </div>
                    <div className="basis-1/3">
                        <Search />
                    </div>
                </div>
                <div>{description}</div>
            </div>
            <div className="mb-8">
                <Filters />
            </div>
            <div>
                <List listItems={filteredList} />
            </div>
        </div>
    );
};

export default Browser;
