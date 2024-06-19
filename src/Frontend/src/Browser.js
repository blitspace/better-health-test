import React from "react";
import { useContext } from "react";
import Filters from "./Filters";
import List from "./List";
import Search from "./Search";
import { DataContext } from "./context/DataContext";


const Browser = ({ title, description }) => {
    const dataContext = useContext(DataContext);

    console.log(dataContext);

    const filteredList = dataContext.data.filter(
        (item) => {
            const catFilter = dataContext.activeCat === "all" || item.category.toLowerCase().includes(dataContext.activeCat.toLowerCase());
            const textFilter = dataContext.textFilter === "" || (
                item.name.toLowerCase().includes(dataContext.textFilter.toLowerCase())
                    || item.description.toLowerCase().includes(dataContext.textFilter.toLowerCase())
            );

            return catFilter && textFilter;
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
