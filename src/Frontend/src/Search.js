import React, { useContext } from "react";
import { DataContext } from "./context/DataContext";


const Search = () => {
    const context = useContext(DataContext);

    return (
        <input
            type="text"
            placeholder="Search"
            className="px-4 py-2 w-full"
            onChange={e => context.updateTextFilter(e.target.value)}
        />
    );
};

export default Search;
