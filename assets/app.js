import React, {useEffect, useState} from 'react';
import ReactDOM, {render} from 'react-dom';
import {Link} from "react-router-dom";
class MyComponent extends React.Component {
    state = {
        data: null,
        showContent: true
    };
    handleClick = () => {
        this.setState(prevState => ({
            showContent: !prevState.showContent
        }));
    }
    componentDidMount() {
        fetch('/product')
            .then(response => response.json())
            .then(data => this.setState({ data }));
    }

    render() {
        const { data } = this.state;

        if (!data) {
            return <div>Loading...</div>;
        }

        return (
            <div className="stock-container">
                <button onClick={this.handleClick}>Toggle content</button>
                {data.map((data, key) => {
                    return (
                        <div key={key}>
                            {"Imie zwierzaka: "+ data.name +
                                " , Typ zwierzaka: " +
                                data.type }
                        </div>
                    );
                })}
            </div>
        );
    }
}
function MyButton() {
    return (
        <input type="button" value="hide data" onClick={handleClick} />
    );
}

ReactDOM.render(<MyComponent />, document.getElementById('app'));
ReactDOM.render(<MyButton />, document.getElementById('button'));