import React, { useContext } from "react";
import { DataContext } from "./context/DataContext";

import './CatNav.css';

const cats = [
    'advisory',
    'design',
    'implementation',
    'support',
    'assessments',
    'trainings',
];

const CatNav = () => {
    const context = useContext(DataContext);

    return (
        <div>
            <div className="relative">
                <div className="cat-item--all">
                    <a
                        href="#"
                        className={`${context.activeCat === 'all' ? 'active' : ''} block text-blue-600 px-4 py-4 bg-gray-200 rounded-md text-center hover:bg-blue-300 transition duration-300`}
                        onClick={(e) => {
                            e.preventDefault();
                            context.updateActiveCat('all');
                        }}
                    >
                        All Life Cycle
                    </a>
                </div>
            </div>
            <div className="relative">
                {cats.map((cat, idx) => {
                    let activeClass = '';
                    if (context.activeCat === cats[idx]) {
                        activeClass = 'active';
                    }
                    return (
                        <div
                            key={idx}
                            className="cat-item px-4 relative"
                        >
                            <a
                                href="#"
                                className={`${activeClass} block text-blue-600 px-4 py-2 bg-gray-200 rounded-md text-center hover:bg-blue-300 capitalize transition duration-300`}
                                onClick={(e) => {
                                    e.preventDefault();
                                    context.updateActiveCat(cats[idx]);
                                }}
                            >{cat}</a>
                        </div>
                    );
            })}
            </div>
        </div>
    );
};

export default CatNav;
