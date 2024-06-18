import React from "react";
import Filters from "./Filters";
import List from "./List";
import Search from "./Search";


const Browser = ({ title, description }) => {
    return (
        <div>
            <div className="mb-8">
                <div className="flex flex-row items-center mb-4">
                    <div className="basis-2/3">
                        <div className="h1 font-bold">{title}</div>
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
                <List />
            </div>
        </div>
    );
};

export default Browser;
